<template>
	<div align="center" style="margin-top: 10px">
		<router-link to="/diary/create">Tulis Diari</router-link>
		<div style="background-color: aqua; width: 70%; height: 400px; padding-top: 20px">
			
			<div v-for="(diary, i) in data_diary" :key="i" align="center" style="background-color: white; width: 70%; margin-top: 10px;">
				<table width=80% style="margin-top: 10px;">
					<tr>
						<th width=70% align="left"><h3>{{diary.judul}}</h3></th>
						<td align="right">{{diary.updated_at}}</td>
					</tr>
					<tr>
						<td colspan="2">
							{{diary.keterangan}}
						</td>
					</tr>
					<tr>
						<td align="left"><button @click="deleteRow(diary.id)">Delete</button></td>
						<td align="right"><router-link :to="'/diary/' + diary.id">Edit</router-link></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import {api} from '@/helper/api'

	export default {
		name: 'Diary',
		data(){
			return{
				data_diary:[]
			}
		},
		mounted(){
			this.get()
		},
		methods:{
			get(){
				api.get('diary').then(res => {
					if (res.data.status === 'success') {
						this.data_diary = res.data.result
					}else{
						console.log(res.data.message)
					}
				}).catch(err=>{
					console.log(err)
				})
			},
			deleteRow(id){
				api.delete('diary/'+id).then(res=>{
					if (res.data.status === 'success') {
						this.get()
					}else{
						console.log(res.data.message)
					}
				}).catch(err=>{
					console.log(err)
				})
			}
		}
	}
</script>