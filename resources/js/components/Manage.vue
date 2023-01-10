<template>
    <div class="container" >
        
        <nav class="navbar bg-body-tertiary bg-primary">
    
            <a class="navbar-brand" href="#">Manage Users</a>
        
        </nav>
        <div class="row justify-content-center m-2">
            <div class="col-md-8">
                <div class="card"> 
                    <div class="card-header"><strong>Users</strong></div>
                
                    <div class="card-body">
                        <div class=""> 
                            <input type="text" placeholder="Enter Name" class="form-control rounded" aria-label="" 
                            aria-describedby="" v-model="manage_input_name" ><br>
                            <input type="email" placeholder="Enter Email" class="form-control rounded" aria-label="" 
                            aria-describedby="" v-model="manage_input_email" >
                            <div class="input-group-append m-1">
                                <button  v-if="!edit_manage_id" type="button" class="btn btn-info" @click="saveManage()">Add Users</button>
                                <button  v-else type="button" class="btn btn-info" @click="updateManage()">Update Users</button>
                            </div>
                            
                        </div>
                        
                            <button style="float:right" type="button" class="btn btn-sm text-danger " @click="resetManage()">
                            Reset</button>
                         
                        <table class="table table-bordered mt-4">
                            <thead>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                           
                                <!-- <tr v-for="(user, index) in " :key="index"> -->
                                    <tr v-for="(manage, index) in manages" :key="index">
                                    <td>{{ ++index}}</td>
                                    <td>{{ manage.name}}</td>
                                    <td>{{manage.email }}</td>
                                    <td>
                                        <button class="btn btn-danger" type="button" @click="deleteManage(--index)">
                                        Delete</button>
                                        <button class="btn btn-primary" type="button" @click="editManage(--index)" >
                                        Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            manages:[],
            api:'http://localhost:8000/api/manages',
            manage_input_name:'',
            manage_input_email:'',
            edit_manage_id:'',
            edit_index:''
        }
    },
    mounted(){
        //get api data
        this.axios.get(this.api).then(res =>{
             this.manages = res.data
            // console.log(res);
        });
    },
    methods:{
        saveManage(){
            
            if(this.manage_input_name && this.manage_input_email){
                this.axios.post(this.api,{'name': this.manage_input_name,'email':this.manage_input_email}).then(res=>{
                    this.manages.push(res.data);
                    this.manage_input_name='';
                    this.manage_input_email='';
                });
            }
            // console.log(this.manage_input_name + ' ' +this.manage_input_email);
        },
        deleteManage(index){
            if(this.manages[index].id){
                    this.axios.delete(this.api+'/'+this.manages[index].id).then(res=>{
                        this.manages.splice(index,1);
                    });
                }
        },
        editManage(index){
                if(this.manages[index].id){
                    this.manage_input_name=this.manages[index].name;
                    this.manage_input_email=this.manages[index].email;
                    this.edit_manage_id=this.manages[index].id;
                    this.edit_index=index;
                    
                    
                }
            },
            updateManage(){
                if(this.manage_input_name.length > 0 && this.manage_input_email.length > 0){
                let data= {'name': this.manage_input_name, 'email':this.manage_input_email}
                this.axios.patch(this.api+'/'+ this.manages[this.edit_index].id,data).then(res =>{
                    // this.todos.push(res.data);
                        this.manages[this.edit_index].name=res.data.name;
                        this.manages[this.edit_index].email=res.data.email;

                    // this.todo_input='';
                        this.resetManage();
                    });            
               }
            },    
            //     if(this.manage_input_name && this.manage_input_email){
               
            //     this.axios.put(this.api,{'name': this.manage_input_name,'email':this.manage_input_email}).then(res =>{
            //         // this.todos.push(res.data);
            //             this.manages[this.edit_index].name=res.data.name;
            //             this.manages[this.edit_index].email=res.data.email;

            //         // this.todo_input='';
            //             this.resetManage();
            //         });            
            //    }
            // },
            resetManage(){
                this.edit_manage_id='',
                this.edit_index='',
                this.manage_input_name='',
                this.manage_input_email=''

            }
    }
}
</script>