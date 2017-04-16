<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Guest Book</h1>
				
				<div class="panel panel-default" v-for="comment in comments">
                    <div class="panel-heading"><router-link v-if="comment.username" :to="'/user/'+comment.user_id" v-text="comment.username"></router-link><template v-else>Guest</template></div>
					
					<div class="panel-body" v-text="comment.text"></div>
				</div>

                <vue-paginator :resource_url="resource_url" ref="vpaginator" @update="updateResource" class="pagination"></vue-paginator>
				
				<add-comment v-bind:user="user" @completed="addComment"></add-comment>
			</div>
		</div>
	</div>
</template>

<script>
	import AddComment from '../components/AddComment.vue';

    export default {
        components: {
            AddComment,
            VuePaginator
        },

        data() {
            return {
                comments: [],
                resource_url: '/api/comment',

            }
        },

        props: ['user'],

		methods: {
            addComment(comment) {
                this.comments.unshift(comment);
                this.$refs.vpaginator.fetchData();
                window.scrollTo(0,0);
			},

            updateResource(data){
                this.comments = data
            }
		}
    }
</script>
