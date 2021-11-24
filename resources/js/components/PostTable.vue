<template>
    <div>
        <div class="flex justify-between w-2/4 ml-60">
            <h4 class="text-red-900 text-xl">Posts Table</h4>
            <button @click="showModal" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Add Post</button>
        </div>

        <div class="flex justify-center">
            <table class="table-auto border-separate border">
              <thead>
                <tr>
                  <th class="border px-4 py-2 font-large">Name</th>
                  <th class="border px-4 py-2 font-large">Description</th>
                  <th class="border px-4 py-2 font-large">Created At</th>
                  <th class="border px-4 py-2 font-large">Updated At</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(post) in posts" :key="post.id">
                    <td class="border px-4 py-2">{{ post.name }}</td>
                    <td class="border px-4 py-2">{{ post.description }}</td>
                    <td class="border px-4 py-2">{{ post.created_at_human_readable }}</td>
                    <td class="border px-4 py-2">{{ post.updated_at_human_readable }}</td>
                </tr>
              </tbody>
            </table>
        </div>

        <b-modal ref="my-modal" hide-footer title="New Post">
          <div class="flex flex-nowrap">
                <label>
                    Name
                    <input type="text" v-model="newPost.name" class="border">
                </label>
                <label>
                    Description
                    <input type="text" v-model="newPost.description" class="border">
                </label>
          </div>
          <div class="flex flex-row-reverse">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="hideModal">Close</button>
                <button class="bg-green-500 hover:bg-green-700 disabled:bg-red text-white font-bold py-2 px-4 rounded mr-2" 
                    @click="savePost" :disabled='!newPost.description || !newPost.name' v-bind:class="{'opacity-50': !newPost.description || !newPost.name}">Save Post</button>
          </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                newPost: {
                    name: '',
                    description: ''
                }
            }
        },
        methods: {
            getPosts() {
                axios.get('/api/posts')
                    .then(response => {
                        this.posts = response.data.post;
                    }).catch(error => {
                        console.log(error)
                    })
            },
            savePost() {
                axios.post('/api/posts', this.newPost)
                .then(response => {
                    this.posts.push(response.data.post);
                    this.hideModal();
                })
                .catch(error => {
                    console.log(error);
                });
            },
            showModal() {
                this.$refs['my-modal'].show()
            },
            hideModal() {
                this.$refs['my-modal'].hide()
            },
        },
        beforeMount() {
            this.getPosts();
        }
    }
</script>