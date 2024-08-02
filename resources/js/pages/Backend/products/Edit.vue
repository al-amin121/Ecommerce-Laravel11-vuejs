<script setup>
import useAxios from "@/composables/useAxios"
import { ref, onMounted } from 'vue'
import vSelect from 'vue-select'
const { loading, error, sendRequest } = useAxios();
import { useRouter } from "vue-router";
import { useRoute } from 'vue-router'

const router = useRouter();

const isLoading = ref(false);

const { params} = useRoute();

const url = ref(null);

const form = ref({
    title:null,
    price:null,
    offer_price:null,
    description:null,
    main_category_id:null,
    sub_category_id	:null,
    brand_id : null ,
    images:[],
    newImages:[]
  });

  const getProduct = ( async () => {
     const response = await sendRequest({
        method: 'get',
        url: `/api/Products/${params.id}/edit`,
     });
     console.log(response.data);
     form.value.id = response.data.id;
     form.value.title = response.data.title;
     form.value.price = response.data.price;
     form.value.offer_price = response.data.offer_price;
     form.value.description = response.data.description;
     form.value.main_category_id = response.data.main_category_id;
     form.value.sub_category_id = response.data.sub_category_id;
     form.value.brand_id = response.data.brand_id;
     form.value.images = response.data.images;
  });

// Main Category section

const categories = ref();
 const getCategories = (async () => {
  const response = await sendRequest({
      method: 'get',
      url: '/api/MainCategory',
      });
      categories.value= response?.data;
  });

// Sub Category section
const subcategories = ref();
 const getSubCategories = (async () => {
  const response = await sendRequest({
      method: 'get',
      url: '/api/SubCategory',
      });
      subcategories.value= response?.data;
  });

  // brand section
  const brands = ref();
  const getBrands = ( async () => {
     const response = await sendRequest({
        method: 'get',
        url: '/api/Brand',
     });
     brands.value = response.data;
  });
onMounted(()=>{
  getProduct()
  getCategories()
  getSubCategories()
  getBrands()
});


const updateForm = async (id) => {
  isLoading.value = true;
  try{
    const response = await sendRequest({
          method: 'POST',
          url: `/api/Products/${id}?_method=PUT`,
          headers: {'Content-Type': 'multipart/form-data' },
          data: form.value,
      });
      getProduct()
      if (response.data) {
        isLoading.value = false;
        router.push('/dashbord/products')
        reset()
      } 
   }catch (error) {
        // Handle network errors or unexpected errors
        console.error("An error occurred:", error);
    }
  
};

// Image selection secton

const handleFileChange = (event) => {
  for (let i = 0; i < event.target.files.length; i++) {
      form.value.newImages.push({
          url: URL.createObjectURL(event.target.files[i]),
          file: event.target.files[i],
      });
  }
};
//image delete
const removeMedia = (index) => {
  let removedImage = form.value.newImages[index];
  if (removedImage.url.startsWith('blob:')) {
      URL.revokeObjectURL(removedImage.url);
  }
  form.value.newImages.splice(index, 1);
};

const deleteImage = async (id) => {
    try{
        await sendRequest({
             method: 'get',
             url: `/api/delete-image/${id}`
        });
        getProduct()
    }catch (error){
        error = 'Not Deleted Images'
    }
}


const reset= () => {
    form.value.newImages = null
}


</script>

<template>
    <AppLayout>
      <div class="mt-5"> 
        <div class=" overflow-hidden  p-10  my-10  w-2/3 mx-auto shadow-xl">
          <h2 class="font-sans font-semibold underline decoration-wavy text-3xl text-center mb-10">Edit Product</h2>
              <div class="form-item h-20 mt-2 flex flex-col">
                <label for="name" class="w-48 font-sans text-xl mb-1">Product Name:</label>
                <input v-model="form.title" type="text" class=" font-sans h-10 rounded-md border border-gray-400 p-3" name="name" id="name"  placeholder="Enter Product Name" />
              </div>
             <!-----------Categoyr--------------->
             <div class="flex justify-between mt-2"> 
                <div class="form-item h-20 flex flex-col">
                  <label for="bdt" class="w-60 text-xl">Category:</label>
                    <v-select
                      label="name"
                      v-model="form.main_category_id"
                      placeholder="Add Category.."
                      :reduce="maincategory => maincategory.id"
                      :options="categories"
                      :searchable="false"
                      class="bt-border-color "
                      return-object
                  ></v-select>
                </div>
                <div  class="form-item h-20 ms-20 flex flex-col ">
                  <label for="bdt" class="w-60 text-xl">Sub Category:</label>
                    <v-select
                      label="name"
                      v-model="form.sub_category_id"
                      placeholder="Add Sub Category.."
                      :reduce="subcategory => subcategory.id"
                      :options="subcategories"
                      :searchable="false"
                      class="bt-border-color "
                      return-object
                  ></v-select>
                </div>
              </div> 
                <!-----------Brand--------------->
             <div class="flex justify-between mt-2"> 
                <div class="form-item h-20 flex flex-col">
                  <label for="bdt" class="w-60 text-xl">Brand:</label>
                    <v-select
                      label="name"
                      v-model="form.brand_id"
                      placeholder="Add Brand.."
                      :reduce="brand => brand.id"
                      :options="brands"
                      :searchable="false"
                      class="bt-border-color "
                      return-object
                  ></v-select>
                </div>
              </div> 
           
             <!-------Price------------>
              <div class="flex justify-between mt-2"> 
                <div class="form-item h-20 flex flex-col">
                  <label for="bdt" class="w-60 font-sans text-xl">Price:</label>
                  <input  v-model="form.price" type="number" class="font-sans h-8 rounded-md border border-gray-400 p-3" name="bdt" id="bdt" placeholder="Enter Price"/>
                </div>
                <div class="form-item h-20 ms-20 flex flex-col ">
                  <label for="usd" class="w-60 font-sans text-xl">Offer Price:</label>
                  <input v-model="form.offer_price"  type="number" class="font-sans h-8 rounded-md border border-gray-400 p-3" name="usd" id="usd" placeholder="Enter Offer Price" />
                </div>
              </div> 
              <!-----Editor------->
              <div class="mt-2" >
                <label for="bdt" class="w-48 font-sans text-xl pb-1">Description:</label>
                <textarea v-model="form.description" class=" h-60 w-full font-sans border rounded  border-gray-400 p-3" placeholder="Enter Your Description"></textarea>
              </div>
              <!--------OldImage ----------->
              <div class="mt-5 border-2 border-dashed border-primary ">
                  <h2 class="w-48 font-sans text-xl font-semibold p-2">Old Image:</h2>
                    <div class="flex flex-row gap-2 p-2">
                        <div v-for="(image, index) in form.images"  :key="image.index"  class="h-32 relative">
                            <button  @click="deleteImage(image.id)" method="get" preserve-scroll  class="w-5 h-5 absolute top-0 right-0  text-primary" type="button">
                                <svg class="" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-case" fill="currentColor" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
                            </button>
                            <img  :src="image?.url" class="w-40 h-32">
                        </div>
                    </div>
                </div>
               <!--IMAGES PREVIEW-->
              <div class="mt-2 w-auto " id="v-pills-image" role="tabpanel" aria-labelledby="v-pills-image-tab" tabindex="0">
                <div class="p-4 rounded-md bg-white shadow mb-4 border-dashed border-2 border-primary  ">
                  <h4 class="pb-3">Image Upload Requirements</h4>
                  <ul style="list-style:disc;" class="ps-4 ">
                      <li>1 MB limit.</li>
                      <li>300 * 200 Size</li>
                      <li>Allowed types: <span class="primary-color"> JPG</span>, <span class="primary-color">JPEG</span>, <span class="primary-color">PNG</span>.</li>
                  </ul>
                  <div class=" bg-white shadow-md">
                    <div class="flex flex-row gap-2 p-2">
                      <!--IMAGES PREVIEW-->
                      <div v-for="(newImage, index) in form.newImages"  :key="newImage.index" class="h-24 relative">
                        <button @click="removeMedia(index)"  class="w-5 h-5 absolute top-0 right-0  text-primary" type="button">
                            <svg class="" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-case" fill="currentColor" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
                        </button>
                        <img :src="newImage.url" class="w-20 h-24">
                        
                      </div>
                        <!--UPLOAD BUTTON-->
                      <div class=" fle justify-center items-center w-24 rounded-md box-decoration-slice bg-gradient-to-r from-indigo-600 to-pink-500 text-white px-2">
                        <label for="mu-file-input" class=" ">
                            <span>
                                <svg viewBox="0 0 1024 1024" class="w-20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#D74825"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M736.68 435.86a173.773 173.773 0 0 1 172.042 172.038c0.578 44.907-18.093 87.822-48.461 119.698-32.761 34.387-76.991 51.744-123.581 52.343-68.202 0.876-68.284 106.718 0 105.841 152.654-1.964 275.918-125.229 277.883-277.883 1.964-152.664-128.188-275.956-277.883-277.879-68.284-0.878-68.202 104.965 0 105.842zM285.262 779.307A173.773 173.773 0 0 1 113.22 607.266c-0.577-44.909 18.09-87.823 48.461-119.705 32.759-34.386 76.988-51.737 123.58-52.337 68.2-0.877 68.284-106.721 0-105.842C132.605 331.344 9.341 454.607 7.379 607.266 5.417 759.929 135.565 883.225 285.262 885.148c68.284 0.876 68.2-104.965 0-105.841z" fill="#312782"></path><path d="M339.68 384.204a173.762 173.762 0 0 1 172.037-172.038c44.908-0.577 87.822 18.092 119.698 48.462 34.388 32.759 51.743 76.985 52.343 123.576 0.877 68.199 106.72 68.284 105.843 0-1.964-152.653-125.231-275.917-277.884-277.879-152.664-1.962-275.954 128.182-277.878 277.879-0.88 68.284 104.964 68.199 105.841 0z" fill="#D74825"></path><path d="M545.039 473.078c16.542 16.542 16.542 43.356 0 59.896l-122.89 122.895c-16.542 16.538-43.357 16.538-59.896 0-16.542-16.546-16.542-43.362 0-59.899l122.892-122.892c16.537-16.542 43.355-16.542 59.894 0z" fill="#312782"></path><path d="M485.17 473.078c16.537-16.539 43.354-16.539 59.892 0l122.896 122.896c16.538 16.533 16.538 43.354 0 59.896-16.541 16.538-43.361 16.538-59.898 0L485.17 532.979c-16.547-16.543-16.547-43.359 0-59.901z" fill="#312782"></path><path d="M514.045 634.097c23.972 0 43.402 19.433 43.402 43.399v178.086c0 23.968-19.432 43.398-43.402 43.398-23.964 0-43.396-19.432-43.396-43.398V677.496c0.001-23.968 19.433-43.399 43.396-43.399z" fill="#$secondary-color: var(--secondary-color, #D74825);"></path></g></svg>
                            </span>
                        </label>
                        <input @change="handleFileChange"  id="mu-file-input" type="file" accept="image/*" multiple hidden>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
              <button v-on:click="updateForm(form.id)" type="submit" class="font-sans p-2 mt-10 rounded-3xl text-xl w-28 h- bg-primary hover:bg-purple-900 text-white"
              :disabled="isLoading"
              >
              <span v-if="isLoading" class="spinner-grow spinner-grow-sm text-white" aria-hidden="true"></span>
                <span v-if="isLoading" class=" flex items-center gap-1">
                    <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    Update...
              </span>
              <span v-else>Update</span>
            </button>
        </div>
    </div>
    </AppLayout>
 </template>