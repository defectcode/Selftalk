import type { NextApiRequest, NextApiResponse } from 'next';
import axios from 'axios';

const handler = async (req: NextApiRequest, res: NextApiResponse) => {
  try {
    const response = await axios.get('http://localhost:8000/api');
    res.status(200).json(response.data);
  } catch (error) {
    res.status(500).json({ message: 'Error fetching users' });
  }
};

export default handler;
