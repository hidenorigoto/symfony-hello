<?php
namespace Example\HelloBundle\Tests\Functional;

use Example\HelloBundle\Entity\Member;
use Example\HelloBundle\Entity\RentalRepository;
use Example\HelloBundle\Entity\Specification\RentalLimit;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RentalLimitTest extends WebTestCase
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var RentalRepository
     */
    private $rentalRepository;

    /**
     * @test
     */
    public function rentalLimitValidationPass()
    {
        $member = new Member();

        $this->rentalRepository->expects($this->once())
            ->method('countFor')
            ->with($this->equalTo($member))
            ->will($this->returnValue(RentalLimit::LIMIT));

        $validator = $this->container->get('validator');
        $errors = $validator->validate($member);

        $this->assertThat(count($errors), $this->lessThanOrEqual(0));
    }

    /**
     * @test
     */
    public function rentalLimitValidationFail()
    {
        $member = new Member();

        $this->rentalRepository->expects($this->once())
            ->method('countFor')
            ->with($this->equalTo($member))
            ->will($this->returnValue(RentalLimit::LIMIT + 1));

        $validator = $this->container->get('validator');
        $errors = $validator->validate($member);

        $this->assertThat(count($errors), $this->greaterThan(0));
    }

    protected function setUp()
    {
        self::$kernel->boot();
        $this->container = self::$kernel->getContainer();
        $this->rentalRepository = $this->getMock('Example\HelloBundle\Entity\RentalRepository', [], [], '', false);
        $this->container->set('example.hello.rental.repository', $this->rentalRepository);
    }
}