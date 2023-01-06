<template>
      <div class="container" >
        
        <nav class="navbar bg-body-tertiary bg-primary">
    
            <a class="navbar-brand" href="#">Manage Users</a>
        
        </nav>
        <!-- {{ my-data }} -->
        <div class="row justify-content-center m-2">
            <div class="col-md-8">
                <div class="card"> 
                    <div class="card-header"><strong>Users</strong></div>
                
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" placeholder=" " class="form-control rounded" aria-label="todo" 
                            aria-describedby="todo" >
                            <div class="input-group-append m-1">
                                <button  type="button" class="btn btn-info" >Add Users</button>
                                <button  type="button" class="btn btn-info" >Update</button>
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
                           
                                <tr v-for="(user, index) in users" :key="index">
                                    <td>{{ index}}</td>
                                    <td>{{ user.name}}</td>
                                    <td>{{ user.email}}</td>
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
    
    <!-- <div>
        <div class="card mt-4">
        <div class="card-body">
            <h4>Manage Users</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div> -->
</template>

<script>
export default {
    data(){
        return{
            users:[],
            api:'',
        }
    },
    mounted(){
        //get api data
        this.axios.get(this.api).then(res =>{
            this.user = res.data
        });
    }
}
</script>