<?php

declare(strict_types=1);

namespace Odiseo\SyliusBlogPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Odiseo\BlogBundle\Doctrine\ORM\ArticleRepository as BaseArticleRepository;
use Odiseo\SyliusBlogPlugin\Entity\ArticleInterface;
use Pagerfanta\Pagerfanta;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelInterface;

final class ArticleCommentRepository extends EntityRepository
{

}
