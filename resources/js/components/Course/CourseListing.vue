<template>
    <div v-for="course in props.courses" :key="course.id">
      <header>
         <h2> {{ course.prefix }} {{ course.number }}</h2>
         <p>{{ course.title }}}</p>
      </header> 
     

    </div>
</template>

<script setup lang="ts">
    import type { Course } from '@/types';
    interface CourseListingProps {
        courses: Course[];
    }

    const props = defineProps<CourseListingProps>();
</script>

<style scoped>

</style>