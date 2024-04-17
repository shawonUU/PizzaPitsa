<template>
  <div class="multi-select2">
    <div class="tags-container">
      <span
        v-for="(tag, index) in selectedTags"
        :key="index"
        class="tag"
      >
        {{ tag }}
        <button @click="removeTag(index)">x</button>
      </span>
    </div>
    <input
      type="text"
      v-model="inputValue"
      @keydown.enter.prevent="addTag"
      placeholder="Add tags..."
      class="custom-input"
    />
  </div>
</template>

<script>
export default {
  name: 'MultiSelect2',
  data() {
    return {
      inputValue: '',
      selectedTags: [],
      options: ['op1', 'op2', 'op3'], // predefined list of options
    };
  },
  watch: {
    selectedTags: {
      handler(newValue) {
        this.$emit('update:value', newValue);
      },
      deep: true,
    },
  },
  methods: {
    addTag() {
      if (this.inputValue && !this.selectedTags.includes(this.inputValue)) {
        this.selectedTags.push(this.inputValue);
        this.inputValue = '';
      }
    },
    removeTag(index) {
      this.selectedTags.splice(index, 1);
    },
  },
};
</script>
<style>
.multi-select2 {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.tags-container {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.tag {
  background-color: #007bff;
  color: white;
  padding: 4px 8px;
  border-radius: 4px;
  display: flex;
  align-items: center;
}

.tag button {
  background: none;
  border: none;
  color: white;
  margin-left: 4px;
  cursor: pointer;
}

.custom-input {
  margin-top: 8px;
}
</style>
