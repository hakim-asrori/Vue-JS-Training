<template>
    <div>
        <section v-if="id">
            <img v-if="detailuser.foto" :src="'/images/'+detailuser.foto" width="200" height="200">
            <h1>Hello {{ detailuser.name }}.</h1>
            <p>Email: {{ detailuser.email }}</p>
            <router-link :to="{name: 'User'}" class="btn btn-outline-primary text-white" >Kembali</router-link>

            <a href="" @click.prevent="handlingDelete" class="btn btn-danger">Hapus</a>

            <router-link :to="{name: 'Edit'}" class="btn btn-warning text-white" >Edit</router-link>
            <router-link :to="{name: 'Upload'}" class="btn btn-success text-white" >Upload Foto</router-link>
        </section>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            detailuser: {}
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        getUser() {
            axios.get('/api/users/'+this.id).then((response) => {
                this.detailuser = response.data;
            })
        },
        handlingDelete() {
            if (confirm('Apakah ingin dihapus?')) {
                axios.delete('/api/users/'+this.id).then((response) => {
                    if (response.data.status) {
                        this.$noty.success(response.data.message)
                        this.$router.push({
                            name: 'User',
                        })
                    }
                })
            } else {
                return false;
            }
        }
    }
}
</script>
