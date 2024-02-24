// currencyHelper.js

import axios from 'axios';

const BASE_CURRENCY_API = '/get-currency'; // Update with your Laravel endpoint

export const getBaseCurrencySymbol = async () => {
  try {
    const response = await axios.get(BASE_CURRENCY_API);
    return response.data.symbol;
  } catch (error) {
    console.error('Error fetching base currency symbol:', error);
    throw error;
  }
};
