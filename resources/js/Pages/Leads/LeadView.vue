<template>
    <Layout>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                            <span class="breadcrumb-sep">/</span>
                            Leads Details
                        </h1>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Lead Details</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name"
                                                   v-model="lead.name"
                                                   id="name" tabindex="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" placeholder="Enter email"
                                                   v-model="lead.email"
                                                   id="email" tabindex="2">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" placeholder="Enter phone"
                                                   v-model="lead.phone"
                                                   id="phone" tabindex="3">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="interested_package">Interested package</label>
                                            <input type="text" class="form-control" placeholder="Enter the package"
                                                   v-model="lead.interested_package" id="interested_package"
                                                   tabindex="4">
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">BirthDay</label>
                                            <input type="date" class="form-control" placeholder="Enter dob"
                                                   v-model="lead.dob"
                                                   id="dob" tabindex="5">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success">Save</button>
                                        <inertia-link class="btn btn-warning" :href="$route('lead.list')">Back
                                        </inertia-link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" v-if="lead.reminders.length > 0">
                        <div class="card-header">Lead reminders</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action" v-for="reminder in lead.reminders" :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-6">{{reminder.reminder}}</div>
                                        <div class="col-md-2">{{reminder.reminder_date | formatDate}}</div>
                                        <div class="col-md-2"><strong>{{reminder.status}}</strong></div>
                                        <div class="col-md-2">
                                            <inertia-link :href="$route('reminder.view', {lead: lead, reminder: reminder})" class="float-right">
                                                >
                                            </inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" v-else>
                        <div class="card-header">Lead reminders</div>
                        <div class="card-body">
                            <inertia-link class="btn btn-success" :href="$route('reminder.add', {lead: lead})">Add new reminder</inertia-link>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout'
import moment from "moment";

export default {
    props: {
        leadProp: Object
    },
    components: {
        Layout
    },
    filters: {
        formatDate: function(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY')
            }
        }
    },
    data() {
        return {
            lead: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                interested_package: ''
            }
        }
    },
    created() {
        this.lead = this.leadProp
    },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/leads/update', this.lead)
        }
    }
}
</script>
