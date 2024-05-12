
<template>
    <div class="bg-black relative flex-col sm:flex sm:justify-center sm:items-center min-h-screen">

        <NavBar/>


        <div class="relative isolate">
        <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-24">
            <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                <h2 class="text-3xl font-bold tracking-tight text-white">Laissez nous un message</h2>
                <dl class="mt-10 space-y-4 text-base leading-7 text-white">
                <div class="flex gap-x-4">
                    <dt class="flex-none">
                    <span class="sr-only">Address</span>
                    <BuildingOffice2Icon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd>28 avenue Guillaume Gilbert<br />1050 Ixelles</dd>
                </div>
                <div class="flex gap-x-4">
                    <dt class="flex-none">
                    <span class="sr-only">Telephone</span>
                    <PhoneIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd><a class="hover:text-gray-900" href="tel:+1 (555) 234-5678">02 726 46 66</a></dd>
                </div>
                </dl>
            </div>
            </div>
            <form @submit.prevent="submit" class="px-6 pb-24 pt-4 sm:pb-32 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <InputLabel
                    class="block text-sm font-semibold leading-6 text-white"
                    value="prenom"
                    />
                    <div class="mt-2.5">
                        <TextInput type="text" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                        v-model="form.prenom"
                        required
                        />
                    </div>

                    <InputError
                       class="mt-2"
                        :message="form.errors.prenom"
                        />
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-white">Nom</label>
                    <div class="mt-2.5">
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
                    <div class="mt-2.5">
                    <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-semibold leading-6 text-white">Numéro de téléphone</label>
                    <div class="mt-2.5">
                    <input type="tel" name="phone" id="phone-number" autocomplete="tel" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-white">Votre message</label>
                    <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                </div>
                <div class="mt-8 flex justify-center">
                <button type="submit" class="rounded-md bg-gray-400 px-8 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-400">
                    Envoyez</button>
                </div>
            </div>
            </form>
        </div>
        </div>
        <PageFooter />
    </div>
  </template>

  <script setup>
  import { BuildingOffice2Icon, EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline'
  import NavBar from "@/Components/NavBar.vue";
import PageFooter from "@/Components/PageFooter.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";


const form = useForm({
    prenom: "",
    nom: "",
    email: "",
    phone: "",
    message: "",
});
  </script>
