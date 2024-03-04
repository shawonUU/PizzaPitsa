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

export const HelperFunctions = {
  methods: {
    async showAmount(value) {
      const response = await axios.get(BASE_CURRENCY_API);
      // console.log(response.data)
      if(response.data.type==1)
        return response.data.symbol+value;
      if(response.data.type==2)
        return value+response.data.symbol;
    //console.log(value+response.data.symbol)
      // return 'fddsf';
    }
  }
};
