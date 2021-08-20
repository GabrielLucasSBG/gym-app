<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        New subscriber
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <submit-form :lead="lead"
                                :packages="packages"
                                @subscribeFormSubmit="handleAddSubscriber"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
import SubmitForm from "./SubscriberForm";

export default {
    props: {
        lead: Object,
        packages: Array
    },
    components: {
        Layout,
        SubmitForm
    },
    methods: {
        handleAddSubscriber(postData) {
            this.$inertia.post(route("lead.subscribe.add"), postData);
        }
    }
};
</script>
