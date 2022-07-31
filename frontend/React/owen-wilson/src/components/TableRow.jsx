import PropTypes from "prop-types";

const TableRow = ({ movie, year, audio, index }) => {
  const testid = "wow-row-".concat(index);

  return (
    <tr className="wows-in-movie" data-testid={testid}>
      <td>{movie}</td>
      <td>{year}</td>
      <td>
        <audio controls>
          <source src={audio} type="audio/mpeg" />
          Your browser does not support the audio tag.
        </audio>
      </td>
    </tr>
  );
};

TableRow.propTypes = {
  movie: PropTypes.string,
  year: PropTypes.number,
  audio: PropTypes.string,
};

export default TableRow;
