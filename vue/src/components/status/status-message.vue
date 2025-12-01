<template>
  <div
      v-if="message"
      :class="['status-message', type]"
      role="alert"
  >
    <span class="icon">
      <template v-if="type === 'success'">✔️</template>
      <template v-else-if="type === 'error'">❌</template>
    </span>
    <span class="text">{{ message }}</span>
  </div>
</template>

<script setup lang="ts">
interface Props {
  type?: 'success' | 'error';
  message?: string;
}

const props = defineProps<Props>();

const type = props.type ?? 'success';
const message = props.message ?? '';
</script>

<style scoped>
.status-message {
  display: flex;
  align-items: center;
  padding: 10px 14px;
  border-radius: 6px;
  font-weight: 500;
  margin: 8px 0;
  font-family: sans-serif;
}
.status-message.success {
  background-color: #d4edda;
  color: #155724;
}
.status-message.error {
  background-color: #f8d7da;
  color: #721c24;
}
.status-message .icon {
  margin-right: 8px;
  font-size: 18px;
}
</style>
