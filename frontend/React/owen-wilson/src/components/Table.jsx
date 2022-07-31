import PropTypes from "prop-types";
import TableRow from "./TableRow";

const Table = ({ data }) => {
  return (
    <table>
      <thead>
        <tr>
          <th>Movie Name</th>
          <th>Year</th>
          <th>Audio</th>
        </tr>
      </thead>
      <tbody>
        {data.map((wow, index) => {
          return <TableRow key={wow.id} {...wow} index={index} />;
        })}
      </tbody>
    </table>
  );
};

Table.propTypes = {
  data: PropTypes.array,
};

export default Table;
