<?php

declare(strict_types=1);

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Tests\Timestampable\Fixture;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\MappedSuperclass]
class MappedSupperClass
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    protected ?int $id = null;

    /**
     * @var string|null
     */
    #[Gedmo\Locale]
    protected $locale;

    /**
     * @var string|null
     */
    #[Gedmo\Translatable]
    #[ORM\Column(name: 'name', type: Types::STRING, length: 191)]
    protected ?string $name = null;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    #[Gedmo\Timestampable(on: 'create')]
    protected ?\DateTimeInterface $createdAt = null;

    /**
     * @codeCoverageIgnore
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
}
