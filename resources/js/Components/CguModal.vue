<!-- resources/js/components/LegalModal.vue -->
<template>
    <div>
        <a @click.prevent="showModal = true" href="#" class="text-lg leading-6 text-gray-600 hover:text-gray-900">Condition d'utilisation</a>
        <Modal :show="showModal" @close="showModal = false">
            <template #default>
                <div class="bg-white p-6 rounded-lg">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            CONDITIONS GENERALES D'UTILISATION ET DE VENTE
                        </h3>
                        <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 1: Objet</h2>
                <p>
                    Les présentes conditions générales d'utilisation et de vente
                    (dites «conditions générales») régissent la navigation sur
                    le site: https://www.mlle-derrico.be et la mise à
                    disposition par Mlle D'errico Vof (dites «le Prestataire»)
                    de ses services auprès de tout internaute ou visiteur du
                    site (dites «l'Utilisateur»). L’identification complète du
                    Prestataire est disponible sur la page des mentions légales
                    du site.
                </p>
            </div>
            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 2: Accès aux services</h2>
                <p>
                    Le site permet à l'Utilisateur la réservation de services
                    auprès du Prestataire, la prise de rendez-vous en ligne par
                    l’Utilisateur. La disponibilité de ces services n’est pas un
                    engagement ferme du Prestataire, qui peut à tout moment
                    restreindre leur accès ainsi que l’étendue des services et
                    fonctionnalités proposés, sous réserve d’honorer les
                    contrats antérieurement conclus. Le site est accessible
                    gratuitement en tout lieu à tout Utilisateur ayant un accès
                    à Internet. Tous les frais supportés par l'Utilisateur pour
                    accéder au service (matériel informatique, logiciels,
                    connexion Internet, etc.) sont à sa charge.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">
                    ARTICLE 3 : Traitement des données à caractère personnel
                </h2>
                <p>
                    Les données personnelles collectées lors de la réservation
                    seront traitées par le Prestataire et stockées dans sa base
                    de données. L'Utilisateur accepte cette politique de
                    traitement des données.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 4: Propriété intellectuelle</h2>
                <p>
                    Les marques, logos, signes ainsi que tous les contenus du
                    module (textes, images, fils…) font l'objet d'une protection
                    par le Code de la propriété intellectuelle et plus
                    particulièrement par le droit d'auteur. L'Utilisateur doit
                    solliciter l'autorisation préalable du Prestataire pour
                    toute reproduction, publication, copie des différents
                    contenus. Il s'engage à une utilisation des contenus du site
                    dans un cadre strictement privé, toute utilisation à des
                    fins commerciales et publicitaires est strictement
                    interdite. Toute représentation totale ou partielle de ces
                    éléments, par quelque procédé que ce soit, sans
                    l’autorisation expresse du prestataire constituerait une
                    contrefaçon sanctionnée par l’article L 335-2 et suivants du
                    Code de la propriété intellectuelle. Il est rappelé
                    conformément à l’article L122-5 du Code de propriété
                    intellectuelle que l’Utilisateur qui reproduit, copie ou
                    publie le contenu protégé doit citer l’auteur et sa source.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 5: Responsabilité</h2>
                <p>
                    L’Utilisateur est responsable des usages qu’il fait des
                    services proposés par le Prestataire, notamment de toute
                    utilisation frauduleuse ou illicite de moyens de paiement.
                    Le prestataire ne peut être tenu pour responsable
                    d’éventuels virus ou programme malveillant qui pourrait
                    infecter l’ordinateur ou tout matériel informatique de
                    l’Utilisateur, résultant d’une utilisation, d’un accès, ou
                    d’un téléchargement provenant du site. L’Utilisateur
                    reconnaît et accepte que le réseau Internet puisse comporter
                    des risques liés à l’absence de protection de certaines
                    données contre des détournements supplémentaires et des
                    risques de contamination par un programme malveillant. Le
                    Prestataire ne peut ainsi être tenu responsable d'aucune
                    perte ou altération de données, d'aucune perte de profit, de
                    chiffre d'affaires, d'opportunité, de temps ou d'aucun
                    dommage indirect, que ladite perte ou ledit dommage soit dû
                    à une négligence, ou à toute autre cause. Le Prestataire ne
                    saurait être tenu responsable envers l’Utilisateur en cas
                    d’indisponibilité des fonctions proposées sur le site. La
                    responsabilité du prestataire ne peut être engagée en cas de
                    force majeure ou du fait imprévisible et insurmontable d'un
                    tiers.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 6: Liens hypertextes</h2>
                <p>
                    Des liens hypertextes peuvent être présents sur le site.
                    L’Utilisateur est informé qu’en cliquant sur ces liens, il
                    sortira du site. Ce dernier n’a pas de contrôle sur les
                    pages web sur ces liens et ne saurait, en aucun cas, être
                    responsable de leur contenu.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 7: Réservation en ligne et frais d’annulation</h2>
                <p>
                    La réservation en ligne permet à l’Utilisateur de réserver
                    une prestation à une date et une heure actuelle auprès du
                    Prestataire parmi ceux proposés sur le site. Le Prestataire
                    s’engage à assurer la prestation réservée par l’Utilisateur.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 8: Rétractation</h2>
                <p>
                    Conformément aux dispositions de l'article L. 211-3 du Code
                    de la consommation, l'Utilisateur titulaire d'un droit de
                    rétractation au sens du Code de la consommation à la faculté
                    de se rétracter de sa réservation et de ses commandes de
                    produits dans les quatorze (14) jours de la réservation des
                    prestations ou dans les quatorze (14) jours de la délivrance
                    des produits. Si la prestation réservée doit être réalisée
                    dans un délai inférieur à ce délai de quatorze jours,
                    l’Utilisateur renonce à l’utilisation de son droit de
                    rétractation. L’Utilisateur est alors tenu d’adresser un
                    courrier recommandé à l’adresse postale ou un message via le
                    formulaire de contact du site. L’Utilisateur doit faire
                    figurer de manière non équivoque sa volonté de se rétracter
                    et définir les produits et services visés par sa
                    rétractation. L’Utilisateur devra remettre en main propre ou
                    réexpédier au prestataire référencé les produits objets de
                    sa rétractation dans un délai de quatorze (14) jours à
                    compter de son exercice du droit de rétractation. Il
                    supportera les coûts directs de la réexpédition de sa
                    commande. Les produits doivent impérativement être retournés
                    dans leur état d’origine, non ouvert, non endommagé. Les
                    produits ne pourront faire l’objet d’une rétractation
                    lorsqu’ils auront été descellés par l’Utilisateur.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">
                    ARTICLE 9: Modification des conditions générales présentes
                </h2>
                <p>
                    Les conditions générales présentes sont modifiables à tout
                    moment par le prestataire et directement applicables lors de
                    leur mise en ligne.
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 10: Service après-vente - Médiation</h2>
                <p>
                    Le Prestataire peut être contacté à tout moment via le
                    formulaire de contact prévu à cet effet sur le site ou à ses
                    coordonnées téléphoniques renseignées dans ses mentions
                    légales. L’Utilisateur, lorsqu’il est un consommateur au
                    sens du Code de la consommation ou des dispositions de droit
                    européen, pourra, s’il le désire, saisir tout médiateur de
                    son choix pour résoudre un éventuel litige avec le Vendeur.
                    L’Utilisateur, lorsqu’il est un consommateur au sens du Code
                    de la consommation, peut accéder à la plateforme européenne
                    de règlement en ligne des litiges (RLL) à l’adresse suivante
                    :
                    https://webgate.ec.europa.eu/odr/main/index.cfm?event=main.home.show&lng=FR
                </p>
            </div>

            <div class="py-4">
                <h2 class="font-bold text-lg pb-1">ARTICLE 11: Droit applicable et juridiction compétente</h2>
                <p>
                    Les lois belges s'appliquent aux conditions générales, sauf
                    application des lois impératives du lieu de résidence de
                    l'Utilisateur consommateur. En cas de litige, les tribunaux
                    belges seront seuls compétents pour en connaître, sauf en ce
                    qui concerne les privilèges de juridiction accordés au
                    consommateur, conformément aux dispositions du Règlement
                    (UE) n ° 1215/2012 du Parlement européen et du Conseil du 12
                    décembre 2012.
                </p>
            </div>
                    </div>
                    <div class="mt-4 text-right">
                        <button @click="showModal = false" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Fermer
                        </button>
                    </div>
                </div>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Modal from './Modal.vue';

const showModal = ref(false);
</script>
