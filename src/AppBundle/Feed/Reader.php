<?php

namespace AppBundle\Feed;

use AppBundle\Entity\Merchant;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class Reader
 * @package AppBundle\Feed
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Reader
{
    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * Constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Reads the merchant's feed and creates or update the resulting offers.
     *
     * @param Merchant $merchant
     *
     * @return int The number of created or updated offers.
     */
    public function read(Merchant $merchant)
    {
        // Lire le content d'un fichier distant
        $content = file_get_contents($merchant->getFeedUrl());

        // Convertir les données JSON en tableau
        $array = json_decode($content, true);

        // Pour chaque couple de données "code ean / prix"
        foreach ($array as $data){
            $eanCode = $data['ean_code'];
        }

            // Trouver le produit correspondant

        $product = $this->em
            ->getRepository('AppBundle:Product')
            ->findOneBy(['eanCode' => $eanCode]);

                // Sinon passer à l'itération suivante

            // Trouver l'offre correspondant à ce produit et ce marchand

                // Sinon créer l'offre

            // Mettre à jour le prix et la date de mise à jour de l'offre

            // Enregistrer l'offre et incrémenter le compteur d'offres

        // Renvoyer le nombre d'offres
    }
}
