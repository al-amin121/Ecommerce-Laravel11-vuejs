<script setup>
import useAxios from "@/composables/useAxios";
import { ref, onMounted } from "vue";
const { loading, error, sendRequest } = useAxios();

//for add category
const url = ref(null);

const form = ref({
    name: null,
    main_category_id:null,
    file:null
})
const isLoading = ref(false);


const addSubCategory = async () => {
    isLoading.value = true;
    const formData = new FormData();
    formData.append('name', form.value.name);
    formData.append('image', form.value.file);
    formData.append('main_category_id', form.value.main_category_id);
try{
    const response = await sendRequest({
        method: 'POST',
        url: 'api/SubCategory',
        data: formData,
    });
    console.log(response)
    reset()
    getData()
    if (response.data) {
        isLoading.value = false;
      } 
   }catch (error) {
        // Handle network errors or unexpected errors
        console.error("An error occurred:", error);
    }

};
const reset= () => {
    form.value.name = null,
    form.value.file = null,
    url.value =null
} 
//for image select section
 const onFileChange = (e) => {
     const file = e.target.files[0];
     form.value.file = file;
     url.value = URL.createObjectURL(file);
 }

 //for category show category page
 const categorys = ref(null);
const getData = (async () => {
const responseData = await sendRequest({
     method: 'get',
     url: 'api/SubCategory',
     });
     console.log(responseData)
     categorys.value = responseData.data;
     
});
onMounted( ()=>{
    getData()
}   
);
// for Main category get 
const MainCategories = ref();
 const getMainCategories = (async () => {
  const response = await sendRequest({
      method: 'get',
      url: 'api/MainCategory',
      });
      MainCategories.value= response?.data;
  });
onMounted(()=>{
    getMainCategories()
});

const deleteData = async (id) =>  {
  try {
    await sendRequest({
        method:'delete',
        url:`/api/SubCategory/${id}`
    });
    getData()
    
  } catch (error) {
    error="faild"
  }

};

//----------- popup model ---------------------------------

const isModel = ref(false)
const newUrl = ref(null);
//get category section

const editAbleCategory = ref(null)
const openModel= (category) =>{
isModel.value=true
editAbleCategory.value=category
}

//for image select section
const categoryFileChange = (e) => {
const file = e.target.files[0];
editAbleCategory.value.image = file; 
newUrl.value = URL.createObjectURL(file);
}

// Update Category section
const updateForm  = async (id) => {
    isLoading.value = true;
try{
 const response = await sendRequest({
        method: 'POST',
        url: `api/SubCategory/${id}?_method=PUT`,
        headers: {'Content-Type': 'multipart/form-data'},
        data: editAbleCategory.value,
    });
    resetModel()
    getData()
    if (response.data) {
        isLoading.value = false;
        toast.success("Successfully update", {
            autoClose: 1000,
            position: toast.POSITION.TOP_RIGHT,
        });
        reset()
      } 
   }catch (error) {
        // Handle network errors or unexpected errors
        console.error("An error occurred:", error);
        toast.error(" Please try again later.", {
            autoClose: 3000,
            position: toast.POSITION.TOP_RIGHT,
        });
    }
    
};

//reset model
const resetModel =()=>{
    isModel.value=false
}

    
   

</script>

<template>
   <AppLayout>
    <div class="mx-5 mt-5">
        <div class="flex justify-start">
            <h2 class="font-sans font-semibold text-3xl">Sub Category</h2>
        </div>
        <div class="flex mt-5 ">
            <div class="grow  p-5 pb-16">
                <div class="bg-white flex items-center shadow-md rounded-md p-2 h-10 mb-5 ">
                    <h2 class="grow flex justify-center font-medium text-lg underline">Image</h2>
                    <h2 class="grow ms-2 flex justify-center items-center  font-medium text-lg underline ">Sub Category</h2>  
                    <h2 class="grow ms-2 flex justify-center items-center  font-medium text-lg underline">Main Category</h2> 
                    <h2 class="flex justify-center items-center font-medium text-lg underline">Action</h2>
                </div>
                <ul>
                    <li v-for="category in categorys" :key="category.id"   class="mb-3">
                        <div class="bg-white flex shadow-md shadow-primary rounded-md p-2 h-20  content-center">
                            <div class="grow flex justify-center w-20">
                                <img :src="category.image"  class="w-16 h-16 rounded-full">
                            </div>
                            <div class="grow ms-2 flex justify-center items-center font-sans font-medium text-lg">{{category.name}}</div>  
                            <div class="grow ms-2 flex justify-center items-center font-sans font-medium text-lg">{{category.main_category.name}}</div> 
                            <div class="grow flex justify-end items-center gap-5 pe-3">
                                <button   class="flex justify-center text-green-950 bg-green-200 w-12 h-7 p-1 rounded-full hover:text-green-950 hover:bg-green-300">
                                    <Button @click="openModel(category)">
                                        <svg class="w-5 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M5.615 20q-.69 0-1.152-.462T4 18.385V5.615q0-.69.463-1.152T5.615 4h8.387l-1 1H5.615q-.23 0-.423.192T5 5.615v12.77q0 .23.192.423t.423.192h12.77q.23 0 .423-.192t.192-.423v-7.489l1-1v8.489q0 .69-.462 1.152T18.385 20zM10 14v-2.615l8.944-8.945q.166-.165.348-.228t.385-.064q.188 0 .368.064q.18.063.326.21L21.483 3.5q.16.165.242.364t.083.401t-.06.382t-.227.345L12.52 14zm10.813-9.715l-1.111-1.17zM11 13h1.092l6.666-6.665l-.546-.547l-.61-.584L11 11.806zm7.212-7.212l-.61-.584zl.546.547z"></path></svg>
                                    </Button>
                                 </button>
                                <button @click="deleteData(category.id)" class="flex justify-center text-red-950 bg-red-200  w-12 h-7 p-1 rounded-full hover:text-red-950 hover:bg-red-300">
                                    <svg class="w-5 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </li>
                    
                </ul>
               
            </div>
            
             <div class="grow pe-2 mb-20"> 
                <div class="p-5 w-96 mx-auto shadow-md shadow-primary rounded-md bg-white"> 
                    <div class="form-item h-20 mt-2 ">
                        <label for="name" class="w-48 font-sans text-xl">Sub Category Name:</label>
                        <input v-model="form.name" type="text" class="mt-2 w-full font-sans h-10 rounded-md border border-gray-400 p-3" name="name" id="name"  placeholder="Enter Category Name" />
                    </div> 
                    <div class="form-item h-20 mt-2 font-sans">
                        <label for="bdt" class="w-48 mb-2 text-xl">Main Category:</label>
                        <v-select
                            label="name"
                            v-model="form.main_category_id"
                            placeholder="Add Category.."
                            :reduce="main_category_id => main_category_id.id"
                            :options="MainCategories"
                            :searchable="false"
                            class="bt-border-color w-full"
                            return-object
                        ></v-select>
                    </div>
                    <div class="mt-2 mb-5">
                        <div  >
                            <label for="category-image" class=" flex w-full h-28 justify-center items-center rounded-md border-dashed border-2 border-primary bg-white text-primary">
                                
                                <div v-if="url" class="h-28 w-full">
                                    
                                    <img  :src="url" alt="" class=" h-full w-full bg-cover rounded-md p-1"> 
                                </div>
                                  
                                <span v-else class="cursor-pointer font-mono text-xl">
                                    <svg viewBox="0 0 1024 1024" class="w-20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#D74825"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M736.68 435.86a173.773 173.773 0 0 1 172.042 172.038c0.578 44.907-18.093 87.822-48.461 119.698-32.761 34.387-76.991 51.744-123.581 52.343-68.202 0.876-68.284 106.718 0 105.841 152.654-1.964 275.918-125.229 277.883-277.883 1.964-152.664-128.188-275.956-277.883-277.879-68.284-0.878-68.202 104.965 0 105.842zM285.262 779.307A173.773 173.773 0 0 1 113.22 607.266c-0.577-44.909 18.09-87.823 48.461-119.705 32.759-34.386 76.988-51.737 123.58-52.337 68.2-0.877 68.284-106.721 0-105.842C132.605 331.344 9.341 454.607 7.379 607.266 5.417 759.929 135.565 883.225 285.262 885.148c68.284 0.876 68.2-104.965 0-105.841z" fill="#312782"></path><path d="M339.68 384.204a173.762 173.762 0 0 1 172.037-172.038c44.908-0.577 87.822 18.092 119.698 48.462 34.388 32.759 51.743 76.985 52.343 123.576 0.877 68.199 106.72 68.284 105.843 0-1.964-152.653-125.231-275.917-277.884-277.879-152.664-1.962-275.954 128.182-277.878 277.879-0.88 68.284 104.964 68.199 105.841 0z" fill="#D74825"></path><path d="M545.039 473.078c16.542 16.542 16.542 43.356 0 59.896l-122.89 122.895c-16.542 16.538-43.357 16.538-59.896 0-16.542-16.546-16.542-43.362 0-59.899l122.892-122.892c16.537-16.542 43.355-16.542 59.894 0z" fill="#312782"></path><path d="M485.17 473.078c16.537-16.539 43.354-16.539 59.892 0l122.896 122.896c16.538 16.533 16.538 43.354 0 59.896-16.541 16.538-43.361 16.538-59.898 0L485.17 532.979c-16.547-16.543-16.547-43.359 0-59.901z" fill="#312782"></path><path d="M514.045 634.097c23.972 0 43.402 19.433 43.402 43.399v178.086c0 23.968-19.432 43.398-43.402 43.398-23.964 0-43.396-19.432-43.396-43.398V677.496c0.001-23.968 19.433-43.399 43.396-43.399z" fill="#$secondary-color: var(--secondary-color, #D74825);"></path></g></svg>
                                </span>
                                <input 
                                    hidden
                                    type="file"
                                    ref="file"
                                    id="category-image"
                                    accept="image/png, image/jpeg"
                                    @change="onFileChange"
                                />
                                
                            </label>
                            
                        </div>
                        
                    </div>
                    <div class="pb-5">
                        <button v-on:click="addSubCategory"  type="submit" class="flex justify-center items-center font-sans p-2 rounded-3xl w-44 h-10 bg-primary hover:bg-purple-900 text-white"
                            :disabled="isLoading"
                            >
                            <span v-if="isLoading" class="spinner-grow spinner-grow-sm text-white" aria-hidden="true"></span>
                            <span v-if="isLoading" class=" flex items-center gap-1">
                                <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                Add Category...
                            </span>
                            <span v-else> Add Category</span>
                           
                        </button>
                    </div>    
                </div>
            </div> 
        </div>
    </div>
    
     <!---------------popup model tailwin css-------------------->
        <div  v-if="isModel"   class="model fixed  z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full ">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white w-1/3">

                <div class="flex justify-end p-2">
                    <button  @click="isModel = false" type="button"
                        class="text-red-400 bg-transparent hover:bg-gray-200 hover:text-red-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="">
                    <div class=" mt-3 px-5 mx-auto  bg-white"> 
                    
                    <div class="form-item h-20 mt-2 ">
                        <label for="name" class="w-48 mb-2 font-sans text-xl items-start flex justify-start">Category Name:</label>
                        <input v-model="editAbleCategory.name" type="text" class="w-full font-sans h-10 rounded-md border border-gray-400 p-3" name="name" id="name"  placeholder="Enter Category Name" />
                    </div> 
                    <div class="form-item h-20 mt-2 font-sans">
                        <label for="bdt" class="w-48 mb-2 text-xl">Main Category:</label>
                        <v-select
                            label="name"
                            v-model="editAbleCategory.main_category_id"
                            placeholder="Add Category.."
                            :reduce="main_category_id => main_category_id.id"
                            :options="MainCategories"
                            :searchable="false"
                            class="bt-border-color w-full"
                            return-object
                        ></v-select>
                    </div>
                    <div class="mt-2 ">
                        <div class="flex" >
                            <label for="category-update" class=" flex w-full h-32 justify-center items-center rounded-md border-dashed border-2 border-primary bg-white text-primary">

                                <span class="cursor-pointer font-mono text-xl">
                                    <svg viewBox="0 0 1024 1024" class="w-20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#D74825"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M736.68 435.86a173.773 173.773 0 0 1 172.042 172.038c0.578 44.907-18.093 87.822-48.461 119.698-32.761 34.387-76.991 51.744-123.581 52.343-68.202 0.876-68.284 106.718 0 105.841 152.654-1.964 275.918-125.229 277.883-277.883 1.964-152.664-128.188-275.956-277.883-277.879-68.284-0.878-68.202 104.965 0 105.842zM285.262 779.307A173.773 173.773 0 0 1 113.22 607.266c-0.577-44.909 18.09-87.823 48.461-119.705 32.759-34.386 76.988-51.737 123.58-52.337 68.2-0.877 68.284-106.721 0-105.842C132.605 331.344 9.341 454.607 7.379 607.266 5.417 759.929 135.565 883.225 285.262 885.148c68.284 0.876 68.2-104.965 0-105.841z" fill="#312782"></path><path d="M339.68 384.204a173.762 173.762 0 0 1 172.037-172.038c44.908-0.577 87.822 18.092 119.698 48.462 34.388 32.759 51.743 76.985 52.343 123.576 0.877 68.199 106.72 68.284 105.843 0-1.964-152.653-125.231-275.917-277.884-277.879-152.664-1.962-275.954 128.182-277.878 277.879-0.88 68.284 104.964 68.199 105.841 0z" fill="#D74825"></path><path d="M545.039 473.078c16.542 16.542 16.542 43.356 0 59.896l-122.89 122.895c-16.542 16.538-43.357 16.538-59.896 0-16.542-16.546-16.542-43.362 0-59.899l122.892-122.892c16.537-16.542 43.355-16.542 59.894 0z" fill="#312782"></path><path d="M485.17 473.078c16.537-16.539 43.354-16.539 59.892 0l122.896 122.896c16.538 16.533 16.538 43.354 0 59.896-16.541 16.538-43.361 16.538-59.898 0L485.17 532.979c-16.547-16.543-16.547-43.359 0-59.901z" fill="#312782"></path><path d="M514.045 634.097c23.972 0 43.402 19.433 43.402 43.399v178.086c0 23.968-19.432 43.398-43.402 43.398-23.964 0-43.396-19.432-43.396-43.398V677.496c0.001-23.968 19.433-43.399 43.396-43.399z" fill="#$secondary-color: var(--secondary-color, #D74825);"></path></g></svg>
                                </span>
                                <input 
                                    hidden
                                    type="file"
                                    ref="file"
                                    id="category-update"
                                    accept="image/png, image/jpeg"
                                    @change="categoryFileChange"
                                />
                                
                            </label>
                            <div  class="h-32 ms-5 w-full rounded-md flex justify-center items-center border-dashed border-2 border-primary bg-white text-primary">
                                <img v-if="newUrl"  :src="newUrl" alt="" class=" h-32 w-full bg-cover rounded-md p-1 "> 
                                <img v-else :src="editAbleCategory.image" class=" h-32 w-full bg-cover rounded-md p-1 ">         
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 pb-5">
                        <button @click="updateForm(editAbleCategory.id)" 
                         type="submit" class=" flex justify-center items-center font-sans p-2 rounded-3xl text-lg w-32 h-10 bg-primary hover:bg-purple-900 text-white"
                         :disabled="isLoading"
                         >
                         <span v-if="isLoading" class="spinner-grow spinner-grow-sm text-white" aria-hidden="true"></span>
                            <span v-if="isLoading" class=" flex items-center gap-1">
                                <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                Update..
                            </span>
                         <span v-else> Update</span>
                        </button>
                    </div>
                </div>
                </div>

            </div>
        </div>
   </AppLayout>
</template>
<style scoped>

</style>