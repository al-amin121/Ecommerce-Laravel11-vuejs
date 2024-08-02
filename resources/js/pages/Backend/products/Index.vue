<script setup>
  import useAxios from "@/composables/useAxios.js"
  import { ref, onMounted } from "vue";


  const { loading, error, sendRequest } = useAxios();
  
  const products = ref(null);

  const getProducts = (async () => {
     const response = await sendRequest({
          method: 'get',
          url: '/api/Products',
     });
     
     products.value = response.data;
  });
  onMounted(() => {
     getProducts()
  });


  const deleteData = async(id) => {
     try{
         const response = await sendRequest({
          method:'DELETE',
          url: `/api/Products/${id}`
          });
          getProducts()
          if (response.data) {
               toast.success("Successfully Delete product", {
               autoClose: 1000,
               position: toast.POSITION.TOP_RIGHT,
          });
          }
     } catch (error){
           // Handle network errors or unexpected errors
          console.error("An error occurred:", error);
          toast.error(" Please try again later.", {
               autoClose: 3000,
               position: toast.POSITION.TOP_RIGHT,
          });
     }
     
}


</script>
<template>
   <AppLayout>
    <div class="ms-5 me-5 mt-5">
        <div class="flex justify-between">
           <h2 class="font-sans font-semibold text-3xl">Manage Product</h2>
          <button class="font-sans text-base font-semibold h-10  me-10 text-white bg-primary hover:bg-purple-900  rounded-3xl">
               <RouterLink to="/add/products" class="flex content-center align-middle ps-3 pe-3">
                    + Add Product
               </RouterLink>
          </button>  
        </div>
        <div class="mt-10 w-full ">
          <ul class="grid grid-cols-1 lg:grid-cols-2  gap-1">
               <li v-for="product in products" :key="product.id"  class="mb-4 shadow-xl shadow-primary font-sans  me-8 ">
                         <div class=" rounded-xl p-5 h-52 flex flex-row bg-white">
                              <div class="basis-1/3 bg-white rounded-lg">
                                   <img  :src="product.images[0].url" class="h-44 rounded-lg w-40 object-cover " alt="Don't Image..!">
                              </div>
                              <div class="basis-2/3 ms-2 rounded-md ">
                                   <div class="p-2">
                                        <RouterLink to="">
                                             <h2 class="font-medium text-lg line-clamp-2" >{{product.title}}</h2>
                                        </RouterLink>
                                        <div >
                                             <div class="flex gap-5 mt-2 items-end pt-2 font-medium justify-between uppercase">
                                                  <h4>category</h4>
                                                  <h4>Brand</h4>
                                             </div>
                                             <div class="flex gap-5 justify-between mt-2">
                                                  <h4>{{product.main_category.name}}</h4>
                                                  <h4>{{product.brand.name}}</h4>
                                             </div>
                                        </div>
                                      
                                   </div>
                                   <div class="flex justify-between items-center p-2 ">
                                        <div class="font-medium">
                                             <h2><span>$</span> {{ product.offer_price }}</h2>
                                        </div>
                                        <div class="flex gap-5 justify-end mt-2">
                                             <!-- <h6 class="text-green-600 hover:text-green-700 w-5 "> -->
                                             <button class="flex justify-center items-center text-green-950 bg-green-100 w-12 h-7 rounded-full hover:text-green-950 hover:bg-green-200">
                                                  <!--  -->
                                                  <RouterLink :to="`/edit/${product.id}`"> 
                                                  <svg class="w-5 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M5.615 20q-.69 0-1.152-.462T4 18.385V5.615q0-.69.463-1.152T5.615 4h8.387l-1 1H5.615q-.23 0-.423.192T5 5.615v12.77q0 .23.192.423t.423.192h12.77q.23 0 .423-.192t.192-.423v-7.489l1-1v8.489q0 .69-.462 1.152T18.385 20zM10 14v-2.615l8.944-8.945q.166-.165.348-.228t.385-.064q.188 0 .368.064q.18.063.326.21L21.483 3.5q.16.165.242.364t.083.401t-.06.382t-.227.345L12.52 14zm10.813-9.715l-1.111-1.17zM11 13h1.092l6.666-6.665l-.546-.547l-.61-.584L11 11.806zm7.212-7.212l-.61-.584zl.546.547z"></path></svg>
                                                  </RouterLink>
                                             </button>
                                                       <!-- </h6> -->
                                             <button @click="deleteData(product.id)"  class="flex justify-center items-center  bg-red-100 w-12 h-7 rounded-full hover:text-red-950 hover:bg-red-200">
                                             <svg class="w-5 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"></path></svg>
                                             </button>
                                        </div>
                                   </div>
                              </div>
                              
                         </div>
                    
               </li>
          </ul>
        </div>
     </div>
   </AppLayout>
</template>