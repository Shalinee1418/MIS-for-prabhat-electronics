async function getUsers() {
  try {
    const response = await fetch("http://localhost:8000/users");

    if (!response.ok) {
      throw new Error(`Error: ${response.status}`);
    }

    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error("Fetch error:", error);
  }
}
getUsers();