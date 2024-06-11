import React from 'react';

type User = {
  id: number;
  first_name: string;
  last_name: string;
  email: string;
  age: number;
  gender: string;
  city: string;
  country: string;
  occupation: string;
  created_at: string;
};

type UserTableProps = {
  data: User[];
  onDelete: (id: number) => void; 
  onUpdate: () => void; 
};

const UserTable: React.FC<UserTableProps> = ({ data, onDelete, onUpdate }) => {
  const handleDeleteClick = (id: number) => {
    onDelete(id);
  };

  const handleUpdateClick = () => {
    onUpdate();
  };

  return (
    <div className="container mx-auto px-4">
      <h1 className="text-2xl font-bold my-4 flex justify-center">User List</h1>
      <table className="min-w-full bg-white">
        <thead>
          <tr>
            <th className="py-2 px-4 border-b">ID</th>
            <th className="py-2 px-4 border-b">First Name</th>
            <th className="py-2 px-4 border-b">Last Name</th>
            <th className="py-2 px-4 border-b">Email</th>
            <th className="py-2 px-4 border-b">Age</th>
            <th className="py-2 px-4 border-b">Gender</th>
            <th className="py-2 px-4 border-b">City</th>
            <th className="py-2 px-4 border-b">Country</th>
            <th className="py-2 px-4 border-b">Occupation</th>
            <th className="py-2 px-4 border-b">Created At</th>
            <th className="py-2 px-4 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          {data.map((user) => (
            <tr key={user.id}>
              <td className="py-2 px-4 border-b">{user.id}</td>
              <td className="py-2 px-4 border-b">{user.first_name}</td>
              <td className="py-2 px-4 border-b">{user.last_name}</td>
              <td className="py-2 px-4 border-b">{user.email}</td>
              <td className="py-2 px-4 border-b">{user.age}</td>
              <td className="py-2 px-4 border-b">{user.gender}</td>
              <td className="py-2 px-4 border-b">{user.city}</td>
              <td className="py-2 px-4 border-b">{user.country}</td>
              <td className="py-2 px-4 border-b">{user.occupation}</td>
              <td className="py-2 px-4 border-b">{user.created_at}</td>
              <td className="py-2 px-4 border-b">
                <button
                  className="bg-red-500 text-white px-4 py-2 rounded mr-2"
                  onClick={() => handleDeleteClick(user.id)}
                >
                  Delete
                </button>
                <button
                  className="bg-blue-500 text-white px-4 py-2 rounded"
                  onClick={handleUpdateClick} 
                >
                  Update
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default UserTable;
