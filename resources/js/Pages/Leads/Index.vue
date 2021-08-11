<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered bg-white">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Package</th>
                            <th>Added On</th>
                            <th></th>
                        </tr>
                        <tr v-for="lead in leads" :key="lead.id">
                            <td>{{lead.id}}</td>
                            <td>{{lead.name}}</td>
                            <td>{{lead.email}}</td>
                            <td>{{lead.phone}}</td>
                            <td>{{moment(lead.dob).format("DD/MM/YYYY")}}</td>
                            <td>{{lead.interested_package}}</td>
                            <td>{{lead.created_at | formatDate}}</td>
                            <td>
                                <inertia-link :href="$route('lead.view', {lead: lead})">
                                    >
                                </inertia-link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout'
import moment from 'moment'

export default {
    components: {
        Layout
    },
    filters: {
        formatDate: function(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY hh:mm')
            }
        }
    },
    props: ['leads']
}
</script>
