import { useEffect, useState } from 'react';
import axios from 'axios';
import UserTable from '../components/UserTable';

const Home = () => {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axios.get('/api/users');
        setUsers(response.data);
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    };

    fetchUsers();
  }, []);

  return (
    <div>
      <UserTable users={users} />
    </div>
  );
};

export default Home;
