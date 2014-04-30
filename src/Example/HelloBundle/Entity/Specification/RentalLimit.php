<?php
namespace Example\HelloBundle\Entity\Specification;

use JMS\DiExtraBundle\Annotation as DI;
use Example\HelloBundle\Entity\RentalRepository;

/**
 * @DI\Service()
 */
class RentalLimit
{
    const LIMIT = 5;

    /**
     * @var RentalRepository
     * @DI\Inject("example.hello.rental.repository")
     */
    public $rentalRepository;

    /**
     * 会員がレンタル数制限を満たしているか？
     */
    public function isSatisfiedBy($target)
    {
        if ($this->rentalRepository->countFor($target) <= self::LIMIT) {
            return true;
        }

        return false;
    }
}