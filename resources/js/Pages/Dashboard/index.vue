<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is Dashboard, welcome {{name}}</p>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';
    export default {
        components: {
            Layout
        },
        props: ['name', 'email']
    }
</script>
