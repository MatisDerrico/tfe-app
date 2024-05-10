
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
                    <dd>545 Mavis Island<br />Chicago, IL 99191</dd>
                </div>
                <div class="flex gap-x-4">
                    <dt class="flex-none">
                    <span class="sr-only">Telephone</span>
                    <PhoneIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd><a class="hover:text-gray-900" href="tel:+1 (555) 234-5678">+1 (555) 234-5678</a></dd>
                </div>
                <div class="flex gap-x-4">
                    <dt class="flex-none">
                    <span class="sr-only">Email</span>
                    <EnvelopeIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd><a class="hover:text-gray-900" href="mailto:hello@example.com">hello@example.com</a></dd>
                </div>
                </dl>
            </div>
            </div>
            <form action="#" method="POST" class="px-6 pb-24 pt-4 sm:pb-32 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-white">First name</label>
                    <div class="mt-2.5">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-white">Last name</label>
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
                    <label for="phone-number" class="block text-sm font-semibold leading-6 text-white">Phone number</label>
                    <div class="mt-2.5">
                    <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
                    <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4" class="block w-full rounded-md bg-black border border-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset focus:ring-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" />
                    </div>
                </div>
                </div>
                <div class="mt-8 flex justify-end">
                <button type="submit" class="rounded-md bg-gray-400 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-400">Send message</button>
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
  </script>
