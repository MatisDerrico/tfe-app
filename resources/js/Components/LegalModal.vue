<!-- resources/js/components/LegalModal.vue -->
<template>
    <div>
        <a @click.prevent="showModal = true" href="#" class="text-lg leading-6 text-gray-600 hover:text-gray-900">Informations légales</a>
        <Modal :show="showModal" @close="showModal = false">
            <template #default>
                <div class="bg-white p-6 rounded-lg">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            INFORMATIONS LÉGALES
                        </h3>
                        <div class="mt-2 text-gray-700">
                            <!-- Contenu des informations légales -->
                            <p>Mlle D'errico Vof</p>
                            <p>28 avenue Guillaume Gilbert, 1050 Ixelles, Belgique</p>
                            <p>BE0722933575</p>
                            <p>02 switch</p>
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
