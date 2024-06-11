'use client'
import React, { useState, useEffect } from 'react';
import UserTable from '../app/components/UserTable';

function App() {
  const [data, setData] = useState([]);
  const [selectedUser, setSelectedUser] = useState(null); 
  useEffect(() => {
    fetch('http://localhost:8000/api')
      .then(response => response.json())
      .then(data => {
        setData(data);
      })
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  const fetchUsers = () => {
    fetch('http://localhost:8000/api')
      .then(response => response.json())
      .then(data => {
        setData(data);
      })
      .catch(error => console.error('Error fetching data:', error));
  };

  const handleDelete = (id: any) => {
    fetch(`http://localhost:8000/api/users/${id}`, {
      method: 'DELETE',
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(() => {
        fetchUsers();
      })
      .catch(error => console.error('Error deleting user:', error));
  };
  
  const handleUpdate = (user: any) => {
    setSelectedUser(user);
  };

  return (
    <div>
      <UserTable data={data} onDelete={handleDelete} onUpdate={App} />
    </div>
  );
}

export default App;
