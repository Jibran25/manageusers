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
                        <div class="input-group">
                            <input type="text" placeholder=" " class="form-control rounded" aria-label="" 
                            aria-describedby="" v-model="manage_input" >
                            <div class="input-group-append m-1">
                                <button  type="button" class="btn btn-info" @click="saveManage()">Add Users</button>
                            </div>
                        </div>
                            <button style="float:right" type="button" class="btn btn-sm text-danger " >
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
                                    <td>{{ manage.id}}</td>
                                    <td>{{ manage.name}}</td>
                                    <td>{{manage.email }}</td>
                                    <td>
                                        <button class="btn btn-danger" type="button">
                                        Delete</button>
                                        <button class="btn btn-primary" type="button" >
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
            manage_input:'default'
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
            console.log(this.manage_input);
        }
    }
}
</script>