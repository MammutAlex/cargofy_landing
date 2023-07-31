<template>
    <q-header bordered class="bg-white">
        <div class="container">
            <q-toolbar class="q-px-none text-dark" style="min-height: 56px">
                <div class="md:tw-hidden q-mr-lg">
                    <q-btn
                        no-caps
                        dense
                        flat
                        round
                        icon="menu"
                        color="dark"
                        @click="toggleDrawer = true"
                    />
                </div>

                <Link :href="route('index')">
                    <img
                        class="q-mr-xl"
                        style="width: 180px"
                        src="@/assets/logo.svg"
                        height="11"
                        width="180"
                        alt="Logo"
                    />
                </Link>

                <div class="q-ml-auto sm:tw-flex items-center">
                    <div class="q-mr-lg tw-hidden sm:tw-block">
                        <a :href="shipperLanding()" target="_blank">{{
                                $t("header.For shippers")
                            }}</a>
                        <a
                            :href="carrierApp()"
                            target="_blank"
                            class="q-ml-xl text-primary text-weight-medium"
                        >{{ $t("header.register") }}</a
                        >
                    </div>

                    <q-btn
                        no-caps
                        color="primary"
                        :href="carrierApp()"
                        target="_blank"
                        flat
                        class="bg-blue-grey-11"
                        :label="$t('header.sign_in')"
                    />
                </div>
            </q-toolbar>
        </div>

        <q-drawer
            v-model="toggleDrawer"
            side="left"
            class="text-black"
            overlay
            bordered
        >
            <q-btn
                no-caps
                dense
                flat
                round
                icon="arrow_back"
                color="dark"
                class="q-ma-md"
                @click="toggleDrawer = false"
            />
            <q-list separator>
                <q-item class="q-px-lg" clickable>
                    <q-item-section
                        :href="shipperLanding()"
                        target="_blank"
                    >
                        <div>
                            {{ $t("header.For shippers") }}
                        </div>
                    </q-item-section>
                </q-item>
                <q-item
                    :href="carrierApp()"
                    target="_blank"
                    class="q-px-lg text-primary text-weight-medium"
                >
                    <q-item-section>
                        <div>
                            {{ $t("header.register") }}
                        </div>
                    </q-item-section>
                </q-item>
            </q-list>
        </q-drawer>
    </q-header>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import {shipperLanding, carrierApp} from '@/core/website.js'
import {ref} from "vue";

const toggleDrawer = ref(false)
</script>
