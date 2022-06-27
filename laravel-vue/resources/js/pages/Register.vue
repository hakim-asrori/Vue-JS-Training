<template>
    <div>
        <h1>Registrasi</h1>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="handleSubmit" class="row col-lg-6">
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="form.name">
                        <div class="error" v-if="errors.name">
                            {{ errors.name[0] }}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="form.email">
                        <div class="error" v-if="errors.email">
                            {{ errors.email[0] }}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="form.password">
                        <div class="error" v-if="errors.password">
                            {{ errors.password[0] }}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-outline-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
    .error {
        color: red;
    }
</style>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
            },
            errors: {}
        }
    },
    methods: {
        handleSubmit() {
            axios.post('/api/users', this.form).then((response) => {

                if (response.data.status) {
                    this.$noty.success(response.data.message)
                    this.$router.push({
                        name: 'User',
                    })
                }
            }).catch((error) => {
                if (error.response.status == 403) {
                    this.errors = error.response.data.message;
                }
            })
        }
    }
}
</script>
