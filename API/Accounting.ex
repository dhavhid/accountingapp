defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Get Token
  # POST http://localhost/oauth/token
  """
  def request() do
    url = "http://localhost/oauth/token"

    # ====== Headers ======
    headers = [
      {"Content-Type", "application/json; charset=utf-8"},
    ]

    # ====== Query Params ======
    params = [  ] 

    # ====== Body ======
    body = "{\"client_id\":\"2\",\"username\":\"teddyb@sample.com\",\"password\":\"12345\",\"scope\":\"\",\"client_secret\":\"wPJCjsHiVZVHyNVdJNPDDhjgOzplrGt43U02uBvR\",\"grant_type\":\"password\"}"

    HTTPoison.start()
    case HTTPoison.post(url, body, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Request
  # GET http://localhost/api/v1/methods
  """
  def request() do
    url = "http://localhost/api/v1/methods"

    # ====== Headers ======
    headers = [
      {"Accept", "application/json"},
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
    ]

    # ====== Query Params ======
    params = [  ] 

    HTTPoison.start()
    case HTTPoison.get(url, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Index
  # GET http://localhost/api/v1/categories?_q&sort=title&sord=asc&page=1&per_page=10
  """
  def request() do
    url = "http://localhost/api/v1/categories"

    # ====== Headers ======
    headers = [
      {"Accept", "application/json"},
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
    ]

    # ====== Query Params ======
    params = [ 
      {"sort", "title"},
      {"sord", "asc"},
      {"page", "1"},
      {"per_page", "10"},
    ]

    HTTPoison.start()
    case HTTPoison.get(url, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Show
  # GET http://localhost/api/v1/categories/1
  """
  def request() do
    url = "http://localhost/api/v1/categories/1"

    # ====== Headers ======
    headers = [
      {"Accept", "application/json"},
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
    ]

    # ====== Query Params ======
    params = [  ] 

    HTTPoison.start()
    case HTTPoison.get(url, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Create Duplicate
  # POST http://localhost/api/v1/categories
  """
  def request() do
    url = "http://localhost/api/v1/categories"

    # ====== Headers ======
    headers = [
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
      {"Content-Type", "application/json; charset=utf-8"},
    ]

    # ====== Query Params ======
    params = [  ] 

    # ====== Body ======
    body = "{\"title\":\"Gas\",\"output\":true,\"description\":\"Gasoline expenses\"}"

    HTTPoison.start()
    case HTTPoison.post(url, body, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Update
  # PUT http://localhost/api/v1/categories/1
  """
  def request() do
    url = "http://localhost/api/v1/categories/1"

    # ====== Headers ======
    headers = [
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
      {"Content-Type", "application/json; charset=utf-8"},
    ]

    # ====== Query Params ======
    params = [  ] 

    # ====== Body ======
    body = "{\"description\":\"Gasoline expenses\"}"

    HTTPoison.start()
    case HTTPoison.put(url, body, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


defmodule SendRequest do
  @moduledoc """
  First, make sure you add HTTPoison to your mix.exs dependencies:

  def deps do
    [{:httpoison, "~> 0.10.0"}]
  end
  """

  @doc """
  # Delete
  # DELETE http://localhost/api/v1/categories/28
  """
  def request() do
    url = "http://localhost/api/v1/categories/28"

    # ====== Headers ======
    headers = [
      {"Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc"},
    ]

    # ====== Query Params ======
    params = [  ] 

    HTTPoison.start()
    case HTTPoison.delete(url, headers, params: params) do
      {:ok, response = %HTTPoison.Response{status_code: status_code, body: body}} ->
        IO.puts("Response Status Code: #{status_code}")
        IO.puts("Response Body: #{body}")

        response
      {:error, error = %HTTPoison.Error{reason: reason}} ->
        IO.puts("Request failed: #{reason}")

        error
    end
  end

end


