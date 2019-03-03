<template>
	<div align="center">
		<h1>Form Diary</h1>
		<form @submit.prevent="submitForm" style="background-color: aqua; width: 80%; padding-top: 20px; padding-bottom: 20px">
			<div style="margin-top: 10px;">
				<label style="margin-top: 10px;">Judul : </label><br>
				<input type="text" v-model="diary.judul" style="margin-top: 10px; min-width: 300px; text-align: center;">
			</div>
			<div style="margin-top: 10px;">
				<label style="margin-top: 10px;">Keterangan : </label><br>
				<textarea v-model="diary.keterangan" style="margin-top: 10px; min-width: 500px; min-height: 200px"></textarea>
			</div>
			<button type="submit" style="margin-top: 10px;">Save</button>
		</form>
	</div>
</template>

<script>
	import {api} from '@/helper/api'

	export default{
		name: 'FormDiary',
		data(){
			return{
				diary: {
					id : null,
					judul: '',
					keterangan: ''
				}
			}
		},
		mounted (){
			let id = this.$route.params.id

			if(id){
				api.get('/diary/'+id).then(res => {
					this.diary = res.data.result
				})
			}
		},
		methods:{
			submitForm(){
				let data = this.diary
				let url = 'diary'

				if (this.diary.id) {
					url += '/' + this.diary.id
				}

				api.post(url, data).then(res =>{
					if (res.data.status === 'success') {
						this.$router.push('/diary')
					}else{
						console.log(res.data.message)
					}
				}).catch(err =>{
					console.log(err)
				})
			}
		}
	}
</script>