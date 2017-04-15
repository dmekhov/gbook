<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Guest Book</h1>
				
				<div class="panel panel-default" v-for="comment in comments">
                    <div class="panel-heading"><router-link v-if="comment.username" :to="'/user/'+comment.user_id" v-text="comment.username"></router-link><template v-else>Guest</template></div>
					
					<div class="panel-body" v-text="comment.text"></div>
				</div>
				
				<add-comment v-bind:user="user" @completed="addComment"></add-comment>
			</div>
		</div>
	</div>
</template>

<script>
	import AddComment from '../components/AddComment.vue';

    export default {
        components: { AddComment },
        
        data() {
            return {
                comments: [],
				user: 'Guest',
            }
        },
        
        created() {
            axios.get('/api/comment')
                .then(response => this.comments = response.data);
            axios.get('/api/user/get-username')
                .then(response => this.user = response.data);
        },

		methods: {
            addComment(comment) {
                this.comments.unshift(comment);
                window.scrollTo(0,0);
			}
		}
    }
</script>
