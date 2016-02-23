<?php
namespace examplecon;

class SimpleScheduleRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private static $dataDirectory;

    /**
     * @var SimpleScheduleRepository
     */
    private $repository;

    public static function setUpBeforeClass()
    {
        self::$dataDirectory = sys_get_temp_dir() . '/' . uniqid(__CLASS__);
        mkdir(self::$dataDirectory);
    }

    public static function tearDownAfterClass()
    {
        #exec('rm -rf ' . self::$dataDirectory);
    }

    protected function setUp()
    {
        $this->repository = new SimpleScheduleRepository(
            self::$dataDirectory,
            new InMemoryScheduleRepository
        );
    }

    public function testScheduleCanBeCreated()
    {
        $schedule = $this->repository->createSchedule();

        $this->assertInstanceOf(Schedule::class, $schedule);
    }

    public function testScheduleCanBeFoundInMemory()
    {
        $schedule = $this->repository->createSchedule();

        $this->assertSame(
            $schedule,
            $this->repository->findById($schedule->id())
        );
    }

    public function testScheduleCanBeFoundOnDisk()
    {
        $schedule = $this->repository->createSchedule();
        $this->repository->commit();

        $repository = new SimpleScheduleRepository(
            self::$dataDirectory,
            new InMemoryScheduleRepository
        );

        $this->assertEquals(
            $schedule,
            $repository->findById($schedule->id())
        );
    }

    public function testCannotFindScheduleThatDoesNotExist()
    {
        $this->expectException(ScheduleNotFoundException::class);

        $this->repository->findById(new ScheduleId(new Uuid));
    }
}
