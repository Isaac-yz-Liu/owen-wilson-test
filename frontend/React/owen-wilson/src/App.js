import { useState, useEffect } from "react";
import API from "./services/API";
import Table from "./components/Table";
import "./App.css";

const App = () => {
  const [show, setShow] = useState(false);
  const [message, setMessage] = useState("Please wait for a sec");
  const [data, setData] = useState([]);

  const fetchData = async () => {
    const response = await API.getExternalData();

    if (response.status === 200) {
      const newData = await API.getInternalData();
      setData(newData);
      setShow(true);
    } else {
      setMessage("failed to get wow data, please try again later");
    }
  };

  useEffect(() => {
    fetchData();
  }, []);

  return (
    <div className="App">
      <h1>Owen Wilson Wows</h1>
      {show ? <Table {...data} /> : <p>{message}</p>}
    </div>
  );
};

export default App;
