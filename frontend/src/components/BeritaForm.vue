<template>
    <div>
        <form @submit.prevent="submitForm">
            <div>
                <label>Judul</label>
                <input type="text" v-model="posts.judul">
            </div>
            <div>
                <label>Isi Berita</label>
                <textarea v-model="posts.post"></textarea>
            </div>
            <div>
                <label>Kategori</label>
                <input type="text" v-model="posts.id_category">
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
    import { api } from '@/helper/api'

    export default {
        name: 'BeritaForm',
        data() {
            return {
                posts: {
                    id: null,
                    judul: '',
                    post: '',
                    id_category: ''
                }
            }
        },
        mounted() {
            let id = this.$route.params.id

            if (id) {
                api.get('/post/' + id).then(res => {
                    this.post = res.data.result
                })
            }
        },
        methods: {
            submitForm() {
                let data = this.posts
                let url = 'post'

                if (this.post.id) {
                    url += '/' + this.post.id
                }

                api.post(url, data).then(res => {
                    if (res.data.status === 'success') {
                        this.$router.push('/berita')
                    } else {
                        console.log(res.data.message)
                    }
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>