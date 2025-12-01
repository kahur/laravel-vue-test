<template>
  <div class="form-wrapper">
    <div class="form">
      <form @submit.prevent="submit">
        <!-- UUID FIELD -->
        <div class="form-field">
          <label>UUID</label>
          <input
              v-model.trim="uuid"
              type="text"
              placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx"
              @input="validateUuid"
          />
          <span v-if="errors.uuid" class="error">{{ errors.uuid }}</span>
        </div>

        <!-- PERCENT FIELD -->
        <div class="form-field">
          <label>Percentage</label>
          <input
              v-model.number="percent"
              type="number"
              placeholder="0–100"
              @input="validatePercent"
          />
          <span v-if="errors.percent" class="error">{{ errors.percent }}</span>
        </div>

        <button class="submit-button" type="submit" :disabled="!formValid || props.loading">
          {{ loading ? 'Saving…' : 'Save' }}
        </button>
      </form>

      <p v-if="message">{{ message }}</p>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';

interface Props {
  loading: boolean
}

const props = defineProps<Props>();

// Emit event when successfully saved
const emit = defineEmits<{
  (e: 'onSubmit', payload: { uuid: string, percent: number }): void;
}>();

const uuid = ref('');
const percent = ref<number | null>(null);
const message = ref('');

const errors = ref({
  uuid: '',
  percent: '',
});

const formValid = computed(() => {
  return (
      uuid.value && percent.value !== null && !errors.value.uuid && !errors.value.percent
  )
});

// UUID v1 - v7 regex
const uuidRegex =
    /^[0-9a-f]{8}-[0-9a-f]{4}-[1-7][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i;

function validateUuid() {
  if (!uuid.value) {
    errors.value.uuid = 'UUID is required';
    return
  }

  if (!uuidRegex.test(uuid.value)) {
    errors.value.uuid = 'Invalid UUID v4 format';
    return;
  }

  errors.value.uuid = '';
}

function validatePercent() {
  if (percent.value === null || percent.value === '') {
    errors.value.percent = 'Battery percentage is require';
    return;
  }

  if (percent.value < 0 || percent.value > 100) {
    errors.value.percent = 'Battery percentage must be value between 0 - 100';
    return;
  }

  errors.value.percent = '';
}

function submit() {
  validateUuid();
  validatePercent();

  if (!formValid.value) return;

  emit('onSubmit', { uuid: uuid.value, percent: percent.value});
}
</script>

<style scoped>
/* Center the form */
.form-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #f4f4f5; /* Light background for subtle contrast */
  padding: 1rem;
}

/* Style the form */
.form {
  background: #ffffff; /* Form background */
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
  width: 100%;
  max-width: 400px;
  box-sizing: border-box;
}

/* Form fields */
.form-field {
  margin-bottom: 1rem;
  display: flex;
  flex-direction: column;
}

.form-field label {
  font-weight: bold;
  margin-bottom: 0.5rem;
  font-size: 1rem;
}

.form-field input {
  padding: 0.75rem;
  border: 1px solid #d1d5db; /* Neutral gray for borders */
  border-radius: 5px;
  font-size: 1rem;
  outline: none;
  transition: border-color 0.3s ease;
}

.form-field input:focus {
  border-color: #2563eb; /* Blue border on focus */
}

/* Error messages */
.error {
  color: #ef4444; /* Red for errors */
  font-size: 0.875rem;
  margin-top: 0.25rem;
}

/* Submit button */
.submit-button {
  display: block;
  width: 100%;
  padding: 0.75rem;
  background-color: #2563eb; /* Blue button */
  color: white;
  font-size: 1rem;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:disabled {
  background-color: #93c5fd; /* Light blue for disabled state */
  cursor: not-allowed;
}

.submit-button:hover:not(:disabled) {
  background-color: #1d4ed8; /* Darker blue on hover */
}
</style>