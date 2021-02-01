<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
            <div class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</div>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" v-model="fields.email" />
            <div class="text-danger" v-if="errors && errors.email">{{ errors.email[0] }}</div>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" rows="5" v-model="fields.message"></textarea>
            <div class="text-danger" v-if="errors && errors.message">{{ errors.message[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Send message</button>

        <div class="alert alert-success mt-3" v-if="success">
            Message sent!
        </div>
    </form>
</template>

<script>
    import FormMixin from "../FormMixin";


    export default {
        name: "ContactForm.vue",
        mixins: [ FormMixin ],

        data() {
            return {
                'action': '/submit',
            }
        }
    }
</script>

<style scoped>

</style>
