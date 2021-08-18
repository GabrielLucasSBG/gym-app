<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('lead.view', {lead: lead})">Leads Details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder Add
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add a new reminder</div>
                        <div class="card-body">
                            <reminder-form :main-reminder="form" @reminderSubmit="handleSubmit"></reminder-form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </layout>
</template>

<script>
import Layout from './../../Shared/Layout'
import ReminderForm from './ReminderForm'

export default {
    props: {
        lead: Object
    },
    components: {
        Layout,
        ReminderForm
    },
    data() {
        return {
            form: this.$inertia.form({
                reminder: '',
                reminder_date: ''
            }),
        }
    },
    methods: {
        handleSubmit(postData) {
            postData.lead_id = this.lead.id

            this.$inertia.post(route('reminder.save'), postData)
        }
    }
}
</script>
