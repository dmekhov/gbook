<template>
	<div class="panel panel-default" id="message-form">
		<div class="panel-heading" v-text="user"></div>
		<form class="panel-body" @submit.prevent="onSubmit" @keyup="form.errors.clear()">
			<div class="form-group" v-bind:class="{'has-error': form.errors.has('text')}">
				<label for="text">Message</label>
				<textarea class="form-control" name="text" id="text" rows="3" required v-model="form.text"></textarea>
				<span class="help-block" v-if="form.errors.has('text')"><strong v-text="form.errors.get('text')"></strong></span>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</template>

<script>
    export default{
        data() {
            return {
                form: new Form({text: ''})
            };
        },

		props: ['user'],
        
        methods: {
            onSubmit() {
                this.form.post('/api/comment')
                    .then(comment => this.$emit('completed', comment));
            }
        }
    }
</script>
