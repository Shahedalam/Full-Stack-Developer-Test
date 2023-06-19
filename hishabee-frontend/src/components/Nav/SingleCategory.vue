<script setup>
import {onMounted, ref,inject} from "vue";
import DropdownIcon from '../icons/dropdown-icon.vue';
const props = defineProps(['singleCategory','child'])
const childExist = ref(false);
function showHide() {
    childExist.value = !childExist.value;
}
const domain = inject("domain");
</script>
<template>
<div @click="showHide" class="flex justify-between cursor-pointer">
    <div class="flex">
        <div v-if="child == 0" class="flex w-8 mr-2">
            <img  v-bind:src="props.singleCategory.icon" class="flex w-full"/>
        </div>
        <div class="my-auto">{{props.singleCategory.name}}</div>
    </div>
    <div v-if="childExist" class="my-auto rotate-180"><DropdownIcon></DropdownIcon></div>
    <div v-else class="my-auto rotate-90"><DropdownIcon></DropdownIcon></div>
</div>
<div v-if="childExist">
    <ul class="block pl-8 my-5 ml-4 text-left border-l border-gray-300">
        <li v-for="child1 in props.singleCategory.child">
            <a v-if="child1.child == undefined || child1.child.length == 0" :href="'#/category/'+ child1.id" class="flex">
                <!-- <div class="flex w-8 mr-2"><img v-bind:src="child1.icon" class="flex w-full"/></div> -->
                <div class="my-auto active">{{child1.name}}</div>
            </a>
            <div v-else>
                <SingleCategory :singleCategory="child1" :child="1"></SingleCategory>
            </div>
        
        </li>
    </ul>
</div>
</template>