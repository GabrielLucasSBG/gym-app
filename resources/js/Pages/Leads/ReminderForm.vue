<template>
    <form>
        <div class="form-group">
            <label for="reminder">Reminder</label>
            <textarea name="reminder" id="reminder" class="form-control" v-model="form.reminder"></textarea>
            <div v-if="$page.props.errors.reminder">{{ $page.props.errors.reminder[0] }}</div>
        </div>

        <div class="form-group">
            <label for="date">Reminder Date</label>
            <input type="date" name="date" id="date" class="form-control" v-model="form.reminder_date">
            <div v-if="$page.props.errors.reminder_date">{{ $page.props.errors.reminder_date[0] }}</div>
        </div>

        <div v-if="mainReminder.id">

        </div>
        <div v-else>
            <button class="btn btn-success" @click="handleSubmit">Save</button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        mainReminder: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                reminder: '',
                reminder_date: ''
            }),
        }
    },
    created() {
        this.form = this.mainReminder
    },
    methods: {
        handleSubmit() {
            this.$emit('reminderSubmit', this.form)
        }
    }
}
</script>
