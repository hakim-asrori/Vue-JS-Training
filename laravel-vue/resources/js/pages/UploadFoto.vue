<template>
    <div>
        <h3>Upload Foto</h3>
        <div class="row col-lg-6">
            <div class="form-group mb-3">
                <img :src="previewImage" width="300" height="300">
            </div>
            <div class="form-group mb-3">
                <input type="file" name="foto" class="form-control" @change="upload">
                <div class="error" v-if="errors.foto">
                    {{ errors.foto[0] }}
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" @click="submit">Upload</button>
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
    props: ['id'],
    data() {
        return {
            previewImage: null,
            foto: null,
            errors: {}
        }
    },
    methods: {
        upload(e) {
            let files = e.target.files[0];
            this.previewImage = URL.createObjectURL(files);

            this.foto = files;
        },
        submit() {
            let formData = new FormData();

            formData.append('foto', this.foto);

            axios.post('/api/users/foto/' + this.id, formData).then((response) => {
                if (response.data.status) {
                    this.$noty.success(response.data.message)
                    this.$router.push({
                        name: 'Profile',
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
