'use client'
import { useState, useEffect } from 'react';
import React from 'react';
import UserTable from  '../app/components/UserTable'

function Home() {
  const [data, setData] = useState([]);  

  useEffect(() => {    
    fetch('http://localhost:8000/api')
      .then(response => response.json())
      .then(data => {
        setData(data);
      })
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  return (
    <div>
      <UserTable data={data} />
    </div>
  );
}

export default Home;
