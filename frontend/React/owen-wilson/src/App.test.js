import { render, screen } from "@testing-library/react";
import App from "./App";

test("before fetching data", () => {
  render(<App />);
  const linkElement = screen.getByText(/Please wait for a sec/i);
  expect(linkElement).toBeInTheDocument();
});
