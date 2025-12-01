<template>
  <div
      class="spinner"
      :style="{
      width: size + 'px',
      height: size + 'px',
      borderWidth: thickness + 'px',
      borderColor: color + '33',
      borderTopColor: color,
    }"
  ></div>
</template>

<script setup lang="ts">
interface Props {
  size?: number;
  thickness?: number;
  color?: string;
}

const props = withDefaults(defineProps<Props>(), {
  size: 32,
  thickness: 4,
  color: "#4caf50",
});
</script>

<style scoped>
.spinner {
  border-style: solid;
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>
